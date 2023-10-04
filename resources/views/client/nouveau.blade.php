<form method="post" action="{{url('client/nouveau')}}">  
        
             @csrf
        <div class="row">
            
      <div class="col-md-6"> 
     <div class="card task-board">
                                    <div class="card-header">
                                        <h3><i class="far fa-user"></i> &nbsp; Nouveau Client </h3>
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
			  				<input type="text" class="form-control form-control-sm" placeholder="Nom de client" id="nom_client" name="nom_client" required>
						</div>
			        </div>
			        
			        <div class="col-md-6">
			        	<div class="form-group">
			    	    	<label class="col-form-label col-form-label-sm" for="clientId">Identifiant : </label>
			 	 			<input type="text" class="form-control form-control-sm" placeholder="Identifiant de client" id="identifiant_client" name="identifiant_client" required>
			 	 		</div>
			        </div>
			    </div>

			    <div class="row">
                    
                    <div class="col-md-6">
			        	<div class="form-group">
			    			<label class="col-form-label col-form-label-sm" for="clientadress">Prenom : </label>
				  			<input type="text" class="form-control form-control-sm" placeholder="Prenom de client" id="prenom_client" name="prenom_client" required>
				  		</div>
				  	</div>
			    	<div class="col-md-6">
			        	<div class="form-group">
			    			<label class="col-form-label col-form-label-sm" for="clientadress">Adresse : </label>
				  			<input type="text" class="form-control form-control-sm" placeholder="Adresse de client" id="adresse_client" name="adresse_client" required>
				  		</div>
				  	</div>
			    </div>

			    <div class="row">
			        <div class="col-md-6">
			        	<div class="form-group">
                            <label class="col-form-label col-form-label-sm" for="clientCity">Ville : </label>
                            
                           
					  		<select id="ville_client" name="ville_client" data-placeholder="Choisir Une Ville..." class="chosen-select" required><option value=""></option>
							@foreach($ville as $ville)	
                            <option value="{{$ville->ID_VILLE}}">{{$ville->NOM_VILLE}}</option>
                            @endforeach
                            
                            
                            </select>
                                </div>
                           
						<div class="form-group" style="margin-top:-15px">
			        		<label class="col-form-label col-form-label-sm" for="clientTel2">Téléphone_2 : </label>
			  				<input type="text" class="form-control form-control-sm" placeholder="Téléphone de client" id="tel2_client" name="tel2_client">
                        </div>
			        </div>
			        
			        <div class="col-md-6">
			        	<div class="form-group">
			  				<label class="col-form-label col-form-label-sm" for="clientTel1">Téléphone : </label>
			  				<input type="text" class="form-control form-control-sm" placeholder="Téléphone de client" id="tel_client" name="tel_client" required="required">

			        		<label class="col-form-label col-form-label-sm" for="clientFax">Fax : </label>
				  			<input type="text" class="form-control form-control-sm" placeholder="Fax de client" id="fax_client" name="fax_client">
			  			</div>
			        </div>
			    </div>

			    <div class="row">
			        <div class="col-md-12">
			        	<div class="form-group">
			  				<label class="col-form-label col-form-label-sm" for="clientMail">Email : </label>
			  				<input type="email" class="form-control form-control-sm" placeholder="Email de client" id="email_client" name="email_client">
						</div>
			        </div>
			    </div>

			    <div class="row">
			        <div class="col-md-6">
			        	<div class="form-group">
			  				<label class="col-form-label col-form-label-sm" for="clientCapital"> Capitale : </label>
			  				<div class="input-group">
                                                        <input type="text" placeholder="montant capital" name="capital_client" class="form-control" required>
                                                        <span class="input-group-append" id="basic-addon3">
                                                            <label class="input-group-text" style="background-color:green;color:white">DH</label>
                                                        </span>
                                                    </div>
						</div>
			        </div>
			        
			        <div class="col-md-6">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientType">Type : </label>
			  				<select class="chosen-select" id="type_client" name="type_client">
								<option value="1">Particulier</option>
								<option value="2" selected>Entreprise</option>
								<option value="3">Professionnel</option>
							</select>
						</div>
                    </div></div>
                              
                               
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        </div></div></div></div>
      
      
      
            <div class="col-md-6"> 
     <div class="card task-board">
                                    <div class="card-header">
                                        <h3><i class="far fa-user"></i> &nbsp; Interlocuteur </h3>
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
			        <div class="col-md-12">
			        	<div class="form-group">
			  				<label class="col-form-label col-form-label-sm" for="interName">Interlocuteur :</label>
			  				<input type="text" class="form-control form-control-sm" placeholder="Nom d'Interlocuteur" id="nom_inter" name="nom_inter">
			                
			                <label class="col-form-label col-form-label-sm" for="interTel">Téléphone :</label>
			  				<input type="text" class="form-control form-control-sm" placeholder="Téléphone d'Interlocuteur" id="tel_inter" name="tel_inter">

			                <label class="col-form-label col-form-label-sm" for="interMail">Email :</label>
			  				<input type="email" class="form-control form-control-sm" placeholder="Email d'Interlocuteur" id="email_inter" name="email_inter">
						</div>
			        </div>
			    </div>
			
                                            
                                       
                                            
                                             
                                            
                                            
                                        </div>
         
         
         </div></div> 
                
                
                <div class="card task-board">
                                   
                                    <div class="card-body todo-task">
                                                
                                               
                                            
                                                <button type="submit" class="btn btn-info" style="width:100%">Ajouter</button>
                                            
                                            
                                            
                                            
                                            
            
            
                    </div></div></div>
      
      
      
      
      
        
        
                                            
                                            
                                            
                                            
      
      
      
      
      
      
      
      
      
      
             </div>    </form>