
const fistForm = document.getElementById("form1");
const secondForm = document.getElementById("form2");

const signInBtn = document.getElementById("signIn");
const signUpBtn = document.getElementById("signUp");
const Form_container = document.querySelector(".Form_container");

function Show_Sign_In() {
	
	Form_container.classList.remove("right-panel-active");
};

function Show_Sign_Up()  {
	
	Form_container.classList.add("right-panel-active");
};


