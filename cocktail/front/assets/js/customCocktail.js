const ingredientColors = document.getElementById('ingredient-colors');
const ingredientList = document.getElementById('ingredient-list');
var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
var drink = [];

checkboxes.forEach(function(checkbox) {
  var id = checkbox.id;
  var value = checkbox.value;
  console.log("etape1");
  var ingredient = {
    texte: id,
    couleur: value
  };
  console.log("etape2");
  drink.push(ingredient);
});

console.log(drink);

function getDrink() {
  ingredientColors.innerHTML = '';
  ingredientList.innerHTML = '';
  
  drink.ingredients.forEach(ingredient => {
    ingredientColors.appendChild(addIngredientColor(ingredient));
    ingredientList.appendChild(addIngredientListItem(ingredient));
  });
  
  drinkTitle.textContent = drink.name;
  
  animateIngredients(ingredientColors);
  animateIngredients(ingredientList);
}

function addIngredientColor(ingredient) {
  let node = document.createElement('div');
  
  node.className = 'ingredient';
  node.dataset.ingredient = ingredient.text;
  node.style.backgroundColor = ingredient.color;
  
  return node;
}

function addIngredientListItem(ingredient) {
  let node = document.createElement('li');
  
  node.className = 'ingredient';
  node.innerHTML = ingredient.text;
  
  return node;
}

function animateIngredients(el) {
  const list = el.querySelectorAll('.ingredient');
  
  [...list].forEach((ingredient, i) => {
    setTimeout(() => {
      ingredient.classList.add('animate');
    }, i * 400);
  })
}