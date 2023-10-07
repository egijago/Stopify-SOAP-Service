document.addEventListener("change", function(event) {
    if (event.target.matches("#search-by") ||
        event.target.matches("#year-filter") ||
        event.target.matches("#genre-filter") ||
        event.target.matches("#sort-by")) {
            processChange()

    }
});

document.addEventListener("keyup", function(event) {
    if (event.target.matches(".search-bar")) {

        processChange()
    }
});

function debounce(func, timeout = 300) {
    let timer;
    return (...args) => {
      clearTimeout(timer);
      timer = setTimeout(() => { func.apply(this, args); }, timeout);
    };
}

function saveInput() {
    const searchQuery = document.querySelector(".search-bar").value;
    const searchBy = document.querySelector("#search-by").value;
    const yearFilter = document.querySelector("#year-filter").value;
    const genreFilter = document.querySelector("#genre-filter").value;
    const sortBy = document.querySelector("#sort-by").value;

    console.log(
        searchQuery,
        searchBy,
        yearFilter, 
        genreFilter,
        sortBy
    )
}
  const processChange = debounce(() => saveInput());