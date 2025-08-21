 async function getRepos() {
      const user = document.getElementById("username").value;
      const repoList = document.getElementById("repoList");
      repoList.innerHTML = "Loading... ⏳";

      try {
        const response = await fetch(`https://api.github.com/users/${user}/repos`);
        if (!response.ok) throw new Error("User not found");
        const repos = await response.json();

        repoList.innerHTML = "";
        repos.forEach(repo => {
          const div = document.createElement("div");
          div.className = "repo";
          div.innerHTML = `
            <a href="${repo.html_url}" target="_blank">${repo.name}</a>
          `;
          repoList.appendChild(div);
        });
        // <br>            ⭐ Stars: ${repo.stargazers_count}

      } catch (error) {
        repoList.innerHTML = `<p style="color:red;">❌ ${error.message}</p>`;
      }
    }