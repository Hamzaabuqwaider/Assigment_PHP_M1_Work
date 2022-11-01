const api = "https://www.breakingbadapi.com/api/characters";

async function getData() {
    try {
        const response = await fetch(api);
        const data = await response.json();
        printData(data);
    } catch (e) {
        console.log("Error", e.message);
    }
}

function printData(data) {
    const header = document.querySelector("#header");
    const content = document.querySelector("#content");
    header.innerHTML +=
        `<select class="form-control" onchange="getCh(this.value)">
    <option>Select Famous</option>
    ${data.map(Character => `<option>${Character.name}</option>`)}
    </select>
    `
}
async function getCh(name) {
    if (name !== 'Select Famous') {
        const response = await fetch(`${api}?name=${name}`);
        const data = await response.json();
        console.log(data);
        content.innerHTML =
            `<h2>${data[0].name} (${data[0].nickname})</h2>
        <h4>${data[0].portrayed}</h4>
        <img src = "${data[0].img}" width="250">`
    }
}



getData();


