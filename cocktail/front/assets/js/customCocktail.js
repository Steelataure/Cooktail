const ingredientColors = document.getElementById('ingredient-colors');
const ingredientList = document.getElementById('ingredient-list');
// var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
// var drink = [];

console.log(drink);

function getDrink() {
  ingredientColors.innerHTML = '';
  ingredientList.innerHTML = '';
  
  drink.forEach(ingredient => {
    ingredientColors.appendChild(addIngredientColor(ingredient));
    ingredientList.appendChild(addIngredientListItem(ingredient));
  });
  
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