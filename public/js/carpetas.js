let currentPath = []; // Simula la ruta actual de carpetas
      const folderContainer = document.getElementById('folderContainer');
      const createFolderBtn = document.getElementById('createFolderBtn');
      const mainView = document.getElementById('mainView');
      const folderView = document.getElementById('folderView');
      const folderName = document.getElementById('folderName');
      const backButton = document.getElementById('backButton');
  
      // Crear una nueva carpeta
      createFolderBtn.addEventListener('click', () => {
        const folderName = prompt('Nombre de la nueva carpeta:');
        if (folderName) {
          addFolder(folderName);
        }
      });
  
      function addFolder(name) {
        const folder = document.createElement('div');
        folder.className =
            'flex flex-col items-center p-4 bg-white rounded-xl cursor-pointer hover:bg-blue-500 shadow-md transition duration-300 ease-in-out';

        folder.innerHTML = `
            <div class="h-16 w-16 flex justify-center items-center mb-2">
            <span class="text-yellow-400 text-6xl">📁</span> 
            </div>
            <span class="font-semibold">${name}</span>
        `;
        folder.addEventListener('click', () => enterFolder(name));
        folderContainer.appendChild(folder);
    }
      // Función para entrar a una carpeta
      function enterFolder(name) {
        currentPath.push(name);
        folderName.textContent = `Estás en: ${name}`;
        showFolderView();
      }
  
      // Mostrar la vista de carpeta
      function showFolderView() {
        mainView.classList.add('hidden');
        folderView.classList.remove('hidden');
      }
  
      // Volver atrás
      backButton.addEventListener('click', () => {
        currentPath.pop();
        showMainView();
      });
  
      // Mostrar la vista principal
      function showMainView() {
        mainView.classList.remove('hidden');
        folderView.classList.add('hidden');
      }