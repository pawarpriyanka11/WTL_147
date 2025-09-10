 const taskInput = document.getElementById("taskInput");
    const taskList = document.getElementById("taskList");
    const categorySelect = document.getElementById("categorySelect");
    const menuItems = document.querySelectorAll(".menu-item");
    const categoryTitle = document.getElementById("categoryTitle");
    const focusCard = document.getElementById("focusCard");
    const doneSound = document.getElementById("doneSound");
    const logo = document.getElementById("logo");
    const hamburger = document.getElementById("hamburger");
    const menu = document.getElementById("menu");

    let tasks = [];


    function toggleMenu() {
      const isOpen = menu.classList.toggle("show");
      hamburger.classList.toggle("active", isOpen);
      hamburger.setAttribute("aria-expanded", String(isOpen));
      menu.setAttribute("aria-hidden", String(!isOpen));
      
      if (window.matchMedia("(max-width: 768px)").matches) {
        document.body.style.overflow = isOpen ? "hidden" : "";
      }
    }

   
    hamburger.addEventListener("click", toggleMenu);
    hamburger.addEventListener("keydown", (e) => {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        toggleMenu();
      }
    });

   
    window.addEventListener("resize", () => {
      if (window.innerWidth > 768) {
        menu.classList.remove("show");
        menu.setAttribute("aria-hidden", "true");
        hamburger.classList.remove("active");
        hamburger.setAttribute("aria-expanded", "false");
        document.body.style.overflow = "";
      }
    });

   
    menuItems.forEach(item => {
      item.addEventListener("click", () => {
        document.querySelector(".menu-item.active").classList.remove("active");
        item.classList.add("active");
        const category = item.getAttribute("data-category");
        categoryTitle.textContent = category;
        showTasks(category);
       
        if (window.matchMedia("(max-width: 768px)").matches) {
          toggleMenu();
        }
      });
    });

   
    taskInput.addEventListener("keypress", function (e) {
      if (e.key === "Enter" && taskInput.value.trim()) {
        const text = taskInput.value.trim();
        const category = categorySelect.value;
        tasks.push({ text, category, completed: false });
        taskInput.value = "";
        showTasks(categoryTitle.textContent);
        focusCard.style.display = "none";
      }
    });

    
    function showTasks(category) {
      taskList.innerHTML = "";
      tasks
        .filter(task => task.category === category)
        .forEach((task, index) => {
          const taskItem = document.createElement("div");
          taskItem.className = "task-item";

          const span = document.createElement("span");
          span.textContent = task.text;

          const completeBtn = document.createElement("button");
          completeBtn.textContent = "✓";
          completeBtn.addEventListener("click", () => {
            doneSound.play();
            span.style.textDecoration = "line-through";
            span.style.color = "gray";
          });

          const editBtn = document.createElement("button");
          editBtn.textContent = "✏️";
          editBtn.addEventListener("click", () => {
            const newText = prompt("Edit task:", task.text);
            if (newText !== null && newText.trim()) {
              tasks[index].text = newText.trim();
              showTasks(category);
            }
          });

          const deleteBtn = document.createElement("button");
          deleteBtn.textContent = "🗑️";
          deleteBtn.addEventListener("click", () => {
            tasks.splice(index, 1);
            showTasks(category);
          });

          taskItem.appendChild(span);
          taskItem.appendChild(editBtn);
          taskItem.appendChild(completeBtn);
          taskItem.appendChild(deleteBtn);

          taskList.appendChild(taskItem);
        });
    }

   
    document.getElementById("date").textContent = new Date().toDateString();

   
    showTasks("My Day");

   
    logo.addEventListener("click", () => {
      const active = document.querySelector(".menu-item.active");
      if (active) active.classList.remove("active");
      document.getElementById("myDayBtn").classList.add("active");
      categoryTitle.textContent = "My Day";
      showTasks("My Day");
      if (menu.classList.contains("show")) toggleMenu();

    });
