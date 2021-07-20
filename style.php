<?php
header("Content-type: text/css; charset: UTF-8");

?>

/*
* Globals
*/


/* Custom default button */
.btn-secondary,
.btn-secondary:hover,
.btn-secondary:focus {
color: #333;
text-shadow: none; /* Prevent inheritance from `body` */
}


/*
* Base structure
*/

body {
text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
background-image:
url("https://images.unsplash.com/photo-1512850183-6d7990f42385?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1534&q=80");
background-repeat: no-repeat;
background-position: center;
background-size:cover;
}

.cover-container {
max-width: 42em;
}


/*
* Header
*/

.nav-masthead .nav-link {
padding: .25rem 0;
font-weight: 700;
color: rgba(255, 255, 255, .5);
background-color: transparent;
border-bottom: .25rem solid transparent;
}

.nav-masthead .nav-link:hover,
.nav-masthead .nav-link:focus {
border-bottom-color: rgba(255, 255, 255, .25);
}

.nav-masthead .nav-link + .nav-link {
margin-left: 1rem;
}

.nav-masthead .active {
color: #fff;
border-bottom-color: #fff;
}