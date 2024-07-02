<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 pb-3">
  <h1 class="pb-3 border-bottom">Others</h1>

  <div id="dataContainer">
  </div>

  <button id="getDataButton">GET data</button>

  <script>
    document.getElementById('getDataButton').addEventListener('click', () => {
      fetch('http://localhost:3000/rest/get', {
        method: 'GET'
      })
        .then(response => response.json())
        .then(data => {
          const dataElement = document.createElement('pre');
          dataElement.textContent = JSON.stringify(data, null, 2);
          document.getElementById('dataContainer').appendChild(dataElement);
        })
        .catch(error => {
          console.error('Chyba při získávání dat:', error);
        });
    });
  </script>
</main>
