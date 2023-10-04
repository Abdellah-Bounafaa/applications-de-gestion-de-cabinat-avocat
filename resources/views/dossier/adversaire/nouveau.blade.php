  <form method="post" action="{{url('adversaire/nouveau')}}">  
        
             @csrf
        <div class="row">
            
      <div class="col-md-6"> 
     <div class="card task-board">
                                    <div class="card-header">
                                        <h3><i class="far fa-user"></i> &nbsp; Nouveau Adversaire </h3>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                                <li><i class="ik ik-minus minimize-card"></i></li>
                                                <li><i class="ik ik-x close-card"></i></li>
                                            </ul>
                                        </div>
                                        
                                    </div>
        
                                    <div class="card-body todo-task">
                                        
                                        <div class="dd" data-plugin="nestable" id="dd">
                                         
                                            
               <div class="row">
			        <div class="col-md-6">
			        	<div class="form-group">
			  				<label class="col-form-label col-form-label-sm" for="clientName">Nom : </label>
			  				<input type="text" class="form-control form-control-sm" placeholder="Nom de adversaire" id="nom_adversaire" name="nom_adversaire" required>
						</div>
			        </div>
			        
			        <div class="col-md-6">
			        	<div class="form-group">
			    	    	<label class="col-form-label col-form-label-sm" for="clientId">Identifiant : </label>
			 	 			<input type="text" class="form-control form-control-sm" placeholder="Identifiant de adversaire" id="identifiant_adversaire" name="identifiant_adversaire" required>
			 	 		</div>
			        </div>
			    </div>

			    <div class="row">
                    
                    <div class="col-md-6">
			        	<div class="form-group">
			    			<label class="col-form-label col-form-label-sm" for="clientadress">Prenom : </label>
				  			<input type="text" class="form-control form-control-sm" placeholder="Prenom de adversaire" name="prenom_adversaire" required>
				  		</div>
				  	</div>
			    	<div class="col-md-6">
			        	<div class="form-group">
			    			<label class="col-form-label col-form-label-sm" for="clientadress">Adresse : </label>  <button data-role="adresse" type="button" class="btn btn-outline-primary btn-icon"><i class="ik ik-plus"></i></button><button data-role="adressehide" type="button" class="btn btn-outline-danger btn-icon" style="display:none"><i class="ik ik-minus"></i></button>
				  			<input type="text" class="form-control form-control-sm" placeholder="Adresse de adversaire" name="adresse_adversaire" required>
				  		</div>
				  	</div>
			    </div>
                                            
                                            <div id="adresse_add" class="row" style="display:none">
                    
                    <div class="col-md-4">
			        	<div class="form-group">
			    			<label class="col-form-label col-form-label-sm" for="clientadress">Adresse1 : </label> 
				  			<input type="text" class="form-control form-control-sm" placeholder="Adresse de adversaire" name="adresse1_adversaire" required>
				  		</div>
				  	</div>
			    	<div class="col-md-4">
			        	<div class="form-group">
			    			<label class="col-form-label col-form-label-sm" for="clientadress">Adresse2 : </label> 
				  			<input type="text" class="form-control form-control-sm" placeholder="Adresse de adversaire" name="adresse2_adversaire" required>
				  		</div>
				  	</div>
                                                
                                                <div class="col-md-4">
			        	<div class="form-group">
			    			<label class="col-form-label col-form-label-sm" for="clientadress">Adresse3 : </label> 
				  			<input type="text" class="form-control form-control-sm" placeholder="Adresse de adversaire" name="adresse3_adversaire" required>
				  		</div>
				  	</div>
			    </div>

			    <div class="row">
			        <div class="col-md-6">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">Ville : </label><br>
                            
                           
					  		<select id="region_adversaire" name="ville_adversaire" data-placeholder="Choisir Une Ville..." class="chosen-select" tabindex="-1" style="display: none;" required><option value=""></option>
							@foreach($ville as $ville)	
                            <option value="{{$ville->ID_VILLE}}">{{$ville->NOM_VILLE}}</option>
                            @endforeach
                            
                            
                            </select>
                                </div>
                           
						<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientTel2">Téléphone 2 : </label>
			  				<input type="text" class="form-control form-control-sm" placeholder="Téléphone de adversaire" name="tel2_adversaire" style="margin-top:-7px">
                        </div>
			        </div>
			        
			        <div class="col-md-6">
			        	<div class="form-group">
			  				<label class="col-form-label col-form-label-sm" for="clientTel1">Téléphone : </label>
			  				<input type="text" class="form-control form-control-sm" placeholder="Téléphone de adversaire" name="tel_adversaire" required="required">

			        		<label class="col-form-label col-form-label-sm" for="clientMail">Email : </label>
			  				<input type="email" class="form-control form-control-sm" placeholder="Email de adversaire" name="email_adversaire">
			  			</div>
			        </div>
			    </div>

			   

			    <div class="row">
			        <div class="col-md-6">
			        	<div class="form-group">
			  				<label class="col-form-label col-form-label-sm" for="clientCapital"> Caution : </label>
			  				<select class="form-control form-control-sm" id="caution_adversaire" name="caution_adversaire" onchange="caution(this)">
								<option value="0" selected>Non</option>
								<option value="1">Oui</option>
								
							</select>
						</div>
			        </div>
			        
			        <div class="col-md-6">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientType">Type : </label>
			  				<select class="form-control form-control-sm" id="type_adversaire" name="type_adversaire">
								<option value="1">Particulier</option>
								<option value="2" selected>Entreprise</option>
								<option value="3">Professionnel</option>
							</select>
						</div>
                    </div></div>
                              
                               
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        </div></div></div></div>
      
            
            
            
            
            
            
            
            <div  class="col-md-6"> 
     <div id="cautionnaire" class="card task-board">
         
         
         
         
                     </div></div>
      
      

                
                
                <div class="card task-board">
                                   
                                    <div class="card-body todo-task">
                                                
                                               
                                            
                                                <button type="submit" class="btn btn-info" style="width:100%">Ajouter</button>
                                            
                                            
                                            
                                            
                                            
            
            
                    </div></div>
      
      
      
      
      
        
        
                                            
                                            
                                            
                                            
      
      
      
      
      
      
      
      
      
      
             </div>    </form>