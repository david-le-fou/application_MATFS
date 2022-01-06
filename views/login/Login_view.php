


<div class="row content">
    <div class="col-sm-2 sidenav">
      
    </div>

    <div class="col-sm-8 text-left"> 
      <div id="logo" style="background-color: white;opacity: 0.9; animation: fondu 15s ease-in-out infinite both; float:center; height:510px;padding: 10px;">                           
          <?php echo form_open('Authentification/login'); ?>

        <div class = "col-md-6 col-md-offset-3" id = "connexion">
          
          <div class = "page-header">
            <h1>EPA <small>Easy Personnel Administrator</small></h1>
          </div>

          <div class ="jumbotron" style="opacity:1; background-color:#cc7268;">
            
            <form class = "form-inline" role = "form">
              <div class = "form-group">
                <label class = "sr-only" for="text">Nom d' utilisateur</label>
                <input type = "text" class = "form-control" id ="user_name" name ="user_name" placeholder = "Nom d' utilisateur"/>
              </div>
              <div class = "form-group">
                <label class = "sr-only" for = "inputPassword">Mot de passe</label>
                <input type = "password" class = "form-control" id = "password" name = "password" placeholder = "Mot de passe"/>
              </div>
              <button type = "submit" name = "connecter" id = "connecter" class = "btn btn-primary">Connecter</button>
            </form>

          </div>

        </div>

      </div>
    </div>

    <div class="col-sm-2 sidenav">

      
    </div>

 </div>