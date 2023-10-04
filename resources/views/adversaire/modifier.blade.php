<div class="modal fade" id="edition" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="fullwindowModalLabel">Identifiant : <strong id="identifiant_cl"></strong></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        
                                       <div class="row">
                                          
                                           
                                           <div class="col-md-4">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">ID_Adversaire : </label><br>
                            
                           
					  		<input  id="id" class="form-control" required disabled>
							
                        </div></div>
                                           
                                           
                                            <div class="col-md-4">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">Nom_Adversaire : </label><br>
                            
                           
					  		<input  id="nom" class="form-control" required>
							
                        </div></div>
                                           
                                           
                                            <div class="col-md-4">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">Prenom_Adversaire : </label><br>
                            
                           
					  		<input  id="prenom" class="form-control" required>
							
                        </div></div>
                                           
                                           
                                           
                                           <div class="col-md-4">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">Email_Adversaire : </label><br>
                            
                           
					  		<input  id="email" class="form-control" required>
							
                        </div></div>
                                           
                                           
			        <div class="col-md-4">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">Ville : </label><br>
                            
                           
					  		<select id="ville" class="chosen-select1">
							@foreach($region as $region)	
                            <option value="{{$region->ID_VILLE}}">{{$region->NOM_VILLE}}</option>
                            @endforeach
                            
                            
                            </select>
                        </div></div>
                                           
                                           
                                           
                                            <div class="col-md-4">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">Adresse : </label> <button data-role="modadresse" type="button" class="btn btn-outline-primary btn-icon"><i class="ik ik-plus"></i></button><button data-role="modadressehide" type="button" class="btn btn-outline-danger btn-icon" style="display:none"><i class="ik ik-minus"></i></button><br>
                            
                           
					  		<input  id="adresse" class="form-control" required>
							
                        </div></div>
                                           
                                           <div id="modadresse_add" class="row col-lg-12" style="display:none">
                    
                    <div class="col-md-4">
			        	<div class="form-group">
			    			<label class="col-form-label col-form-label-sm" for="clientadress">Adresse1 : </label> 
				  			<input type="text" class="form-control form-control-sm" id="adresse1">
				  		</div>
				  	</div>
			    	<div class="col-md-4">
			        	<div class="form-group">
			    			<label class="col-form-label col-form-label-sm" for="clientadress">Adresse2 : </label> 
				  			<input type="text" class="form-control form-control-sm"  id="adresse2">
				  		</div>
				  	</div>
                                               
                                               <div class="col-md-4">
			        	<div class="form-group">
			    			<label class="col-form-label col-form-label-sm" for="clientadress">Adresse3 : </label> 
				  			<input type="text" class="form-control form-control-sm"  id="adresse3">
				  		</div>
				  	</div>
                                               
                                               
			    </div>
                                           
                                           
                                           <div class="col-md-4">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">Télèphone : </label><br>
                            
                           
					  		<input  id="tel" class="form-control" required>
							
                        </div></div>
                                           
                                           
                                           
                                           
                                           <div class="col-md-4">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">Caution : </label><br>
                            
                           
					  	
                            <select id="caution" class="form-control" disabled>
                            <option value="0">Non</option>
                                <option value="1">Oui</option>
                                
                            </select>
                                                        
                                                        
                        </div></div>
                                           
                                           
                                           
                                           <div class="col-md-4">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">Type : </label><br>
                            
                           
					  		<select id="type" class="chosen-select1">
							@foreach($type as $type)	
                            <option value="{{$type->ID_TYPET}}">{{$type->LIBELLE_TYPET}}</option>
                            @endforeach
                            
                            
                            </select>
                        </div></div>
                                           
                                             
      
                                        
                                        
                                        </div>
                                        
                                      
                                        <div id="caution_modifier" class="row">
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" data-role="sauvegarder" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>