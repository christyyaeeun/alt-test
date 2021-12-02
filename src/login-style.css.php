
<?php header("Content-type: text/css"); ?>

body{
    margin-top: 0 !important;
    padding: 0;    
    background-color:lightslategray;
}



#gif > img{
    margin:auto;
}

/*INPUT AND SPACING*/
.form-control{
    margin-bottom: .7em !important;

    font-size: medium;
    background-color: #f3f5fd;
}

body > div{
    padding: 2em 1em 5em;
}

/* SUBMIT BUTTON */
/* TOP RIGHT BOTTOM LEFT */
div{
    margin: .5em .5em 0em .5em;
}


.btn{
    border-radius: .5em;
    border:none;
    background-color: #7386D5;
    margin-top:.6em;
}


.btn:hover{
    background-color: #dbe1f8;
}



@media (max-width: 576px) { 
    article.container{
    padding-bottom: 2em;
    padding-top: 2em;
    margin-bottom: 1em;

    }
}

/* CARD SIZING */
.d-flex{
    background-color: #ffffff;

    border-radius: 20px;
    justify-content: center;
    margin-right: auto;
    margin-left: auto;
    max-width: 450px;


}

body > div.d-flex.flex-column.text-center.justify-content-center.shadow-lg > form > div{
    margin-top: 1em;
}
/* Small devices (landscape phones, 576px and up)*/
@media (min-width: 576px){

    
    article.container{
        max-width:444px;
    }
}
