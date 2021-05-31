
let searchable=[
    'PHP',
    'Code',
    'HTML',
];

const searchInput = document.getElementById('search');
const searchWrapper = document.querySelector('.wrapper');
const resultsWrapper = document.querySelector('.results');

searchInput.addEventListener('keyup',(e) => {
    let results = [];
    let input = searchInput.value;
    // console.log(input.length);
    if (input.length) {
        results = searchable.filter((item) => {
            return item.toLowerCase().includes(input.toLowerCase());
        });
    }
    // console.log(e.target.value);
    renderResults(results);
});

function renderResults(results) {
    if (!results.length) {
        return searachWrapper.classList.remove('show');
    }
    
    let content = results
    .map((item) => {
        return '<li>$(item)</li>'
    })
    .join('');

    // console.log(content);
    searachWrapper.classList.add('show');
    
}
