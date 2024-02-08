import axios from "axios";
import "./bootstrap";

console.log("Hello! I am app.js");

let sortValue;

const showErrors = (errors) => {
    const section = document.querySelector('[data-errors]');
    section.innerHTML = ''; // istrinam
    const ul = document.createElement('ul'); // sukreitinam dokumenta, taga ul
    section.appendChild(ul); // i sekcija idedam ul
    for (let key in errors) { 
        const li = document.createElement('li'); // sukuriamas li tagas
        li.textContent = errors[key]; // sukuriame i pranesima
        ul.appendChild(li);
    }
    section.addEventListener('click', () => {
        section.innerHTML = '';
    });
    setTimeout(() => { // automatinis pranesimo p[anaikinimas
        section.innerHTML = '';
    }, 5000);
}

const makeLinks = () => {
    const links = document.querySelectorAll("[data-links] a");
    links.forEach((link) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const url = e.target.href;
            const pageNumber = url.split("=").pop();
            getList(pageNumber);

            // console.log(pageNumber);
        });
    });
};

const clearForm = (form) => {
    form.querySelectorAll("input").forEach((input) => {
        input.value = "";
    });
};

const destroyFromList = (url) => {
    axios
        .delete(url)
        .then((response) => {
            console.log(response.data);
            getList();
        })
        .catch((error) => {
            console.error(error);
        });
};

const updateFormList = (url, data) => {
    axios
        .put(url, data)
        .then((response) => {
            console.log(response.data);
            getList();
        })
        .catch((error) => {
            console.error(error);
        });
};

const deleteFromList = (url) => {
    // console.log('Delete', url);
    axios
        .get(url)
        .then((response) => {
            const section = document.querySelector("[data-modal-delete]");
            section.innerHTML = response.data.html;
            section.querySelectorAll("[data-close]").forEach((button) => {
                button.addEventListener("click", () => {
                    section.innerHTML = "";
                });
            });
            const destroy = section.querySelector("[data-destroy]");
            destroy.addEventListener("click", () => {
                const url = destroy.dataset.url;
                destroyFromList(url);
                section.innerHTML = "";
            });
        })
        .catch((error) => {
            console.error(error);
        });
};

const editFromList = (url) => {
    axios.get(url).then((response) => {
        const section = document.querySelector("[data-modal-edit]");
        section.innerHTML = response.data.html;
        section.querySelectorAll("[data-close]").forEach((button) => {
            button.addEventListener("click", () => {
                section.innerHTML = "";
            });
        });
        section
            .querySelector("[data-update]")
            .addEventListener("click", (e) => {
                const url = e.target.dataset.url;
                const data = {};
                section.querySelectorAll("input").forEach((input) => {
                    data[input.name] = input.value;
                });
                updateFormList(url, data);
                section.innerHTML = ""; // iškvietus funkcija lentele uždaro
            });
    });
};

const showFromList = (url) => {
    axios
        .get(url)
        .then((response) => {
            const section = document.querySelector("[data-modal-show]");
            section.innerHTML = response.data.html;
            section.querySelectorAll("[data-close]").forEach((button) => {
                button.addEventListener("click", () => {
                    section.innerHTML = "";
                });
            });
        })
        .catch((error) => {
            console.error(error);
        });
};

const addEventsToList = () => {
    const list = document.querySelector("[data-list]");
    const buttons = list.querySelectorAll("button");
    buttons.forEach((button) => {
        button.addEventListener("click", () => {
            const url = button.dataset.url;
            // const id = button.dataset.id;
            const action = button.dataset.action;
            if (action === "delete") {
                deleteFromList(url);
            } else if (action === "edit") {
                editFromList(url);
            } else if (action === "show") {
                showFromList(url);
            } else {
                console.error("Action not found");
            }
        });
    });
};

const getList = (page = 0) => {
    const list = document.querySelector("[data-list]");
    const url = list.dataset.url;

    const sortUrl = sortValue ? `${url}?sort=${sortValue}` : url;

    let pageUrl = sortUrl;

    if (sortValue) {
        if (page > 0) {
            pageUrl = `${sortUrl}&page=${page}`;
        }
    } else {
        if (page) {
            pageUrl = `${url}?page=${page}`;
        }
    }

    axios.get(pageUrl)
        .then((response) => {
            // console.log(response.data);
            list.innerHTML = response.data.html;
            addEventsToList();
            makeLinks();
        })
        .catch((error) => {
            console.error(error);
        });
};

if (document.querySelector("[data-create-form]")) {
    const createForm = document.querySelector("[data-create-form]");
    const url = createForm.dataset.url;
    const button = createForm.querySelector("button");
    const inputs = createForm.querySelectorAll("input");

    button.addEventListener("click", () => {
        const data = {};
        inputs.forEach((input) => {
            data[input.name] = input.value;
        });

        axios
            .post(url, data)
            .then((response) => {
                console.log(response.data);
                clearForm(createForm);
                getList();
            })
            .catch((error) => {
                console.error(error);
                showErrors(error.response.data.errors);
            });
    });

    if (document.querySelector("[data-list]")) {
        getList();
    }

    if (document.querySelector("[data-sort-select]")) {
        const select = document.querySelector("[data-sort-select]");
        select.addEventListener("change", (e) => {
            // console.log(e.target.value);
            sortValue = e.target.value;
            getList();
        });
    }

    // console.log('createForm:', url);
}
