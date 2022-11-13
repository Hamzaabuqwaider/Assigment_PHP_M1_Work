
// const aName = document.getElementById('a-name');
// const aImage = document.getElementById('a-img');
// const arow = document.getElementById('add-row');
// const aDiet = document.getElementById('a-diet');
// const cbtn = document.getElementById('btn-click');
// let animalObj1;
// let animalObj2;

// const animalData1 = fetch(`https://zoo-animal-api.herokuapp.com/animals/rand/${10}`);
// const animalData2 = fetch(`https://zoo-animal-api.herokuapp.com/animals/rand/${10}`);
// animalData1
//     .then(response => {
//         return response.json();
//     })
//     .then(function (data) {
//         animalObj1 = data;
//         // console.log(animalObj1);
//     });

// animalData2
//     .then(response => {
//         return response.json();
//     })
//     .then(function (data) {
//         animalObj2 = data;
//         const array3 = animalObj1.concat(animalObj2);

//         const x = array3.map((item, index) => {
//             return `<div class="col-3 m-5">
//             <div class="card-img card m-auto" style="width: 18rem;">
//                 <img id="a-img" src="${item.image_link}" class="card-img-top" alt="...">
//                 <div class="card-body">
//                     <h5 id="a-name" class="card-title">${item.name}</h5>
//                     <p id="a-diet" class="card-text">${item.diet}</p>
//                 </div>
//                 <a href="animal.php?id=${item.id}" class="a-hamza btn btn-primary">Click</a>
//             </div>
//         </div>`
//         });

//         arow.innerHTML = x.join('');
//     });
// function onclick_btn() {

//     console.log(location.search.slice(4));
// }
