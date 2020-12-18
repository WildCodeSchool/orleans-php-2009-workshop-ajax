/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.scss in this case)
import './styles/app.scss';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
import $ from 'jquery';

import 'bootstrap';

console.log('Hello Webpack Encore! Edit me in assets/app.js');

document.getElementById('searchField').addEventListener('input', function(event) {
    const query = event.target.value;

    if (query !== '') {
        fetch('/programs/autocomplete?q=' + query)
        .then(res => res.json())
        .then(json => {
            document.getElementById('autocomplete').replaceChildren(
                ...json.map(
                    function(result) {
                        const li = document.createElement('li');
                        li.innerHTML = `${result.title}`;
                        return li;
                    }
                )
            );
        });
    }
    else {
        document.getElementById('autocomplete').replaceChildren();
    }
});
