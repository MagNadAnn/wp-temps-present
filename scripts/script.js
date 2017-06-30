// alert("BOOOM !")

(function () { // IIFE

function initElements () {

  const uiElements = new Map();
  uiElements.set('shadower', document.querySelector('.shadower'));
  uiElements.set('siteMenuTrigger', document.querySelector('.site-menu-trigger'));
  uiElements.set('navExhaustive', document.querySelector('.l-nav-exhaustive'));

  return uiElements;
}

function handleSiteMenuTrigger (uiElements) {
	const shadower = uiElements.get('shadower');
	const navExhaustive = uiElements.get('navExhaustive');

	shadower.classList.add('active');
	navExhaustive.classList.add('active');
}

function handleShadower (uiElements) {
	const shadower = uiElements.get('shadower');
	const activeElements = document.querySelectorAll('.active')

	for (let i = 0; i < activeElements.length; i += 1) {
		activeElements[i].classList.remove('active');
	}
	
}

function initEvents (uiElements) {

	uiElements.get('siteMenuTrigger').addEventListener('click', function (event) {
		console.log ('---------- NEW INPUT - siteMenuTrigger ----------');
		handleSiteMenuTrigger(uiElements);
	});

	uiElements.get('shadower').addEventListener('click', function (event) {
		console.log ('---------- NEW INPUT - shadower ----------');
		handleShadower(uiElements);
	});

}

let uiElements = initElements();
initEvents(uiElements);

} ());