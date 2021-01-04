document.getElementById('searchField').addEventListener('input', function(event) {
    fetch('/programs/autocomplete?q=' + this.value)
        .then(response => response.json())
        .then(series => {
            let results = document.getElementById('autocomplete');
            results.innerText = '';
            for(serie of series) {
                let resultList = document.createElement('li');
                let link = document.createElement('a');
                link.href='/programs/' + serie.id;
                link.innerText = serie.title;
                resultList.appendChild(link);
                results.appendChild(resultList);
            }
        })
});
