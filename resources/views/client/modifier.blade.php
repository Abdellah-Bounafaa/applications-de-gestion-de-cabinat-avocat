<div class="modal fade" id="edition" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="fullwindowModalLabel">Identifiant : <strong id="identifiant_cl"></strong></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        
                                       <div class="row">
                                          
                                           
                                           <div class="col-md-6">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">ID_Client : </label><br>
                            
                           
					  		<input  id="id" class="form-control" required disabled>
							
                        </div></div>
                                           
                                           
                                            <div class="col-md-6">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">Nom_Client : </label><br>
                            
                           
					  		<input  id="nom" class="form-control" required>
							
                        </div></div>
                                           
                                           
                                            <div class="col-md-6">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">Prenom_Client : </label><br>
                            
                           
					  		<input  id="prenom" class="form-control" required>
							
                        </div></div>
                                           
                                           
			        <div class="col-md-6">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">Ville : </label><br>
                            
                           
					  		<select id="ville" class="chosen-select1">
							@foreach($region as $region)	
                            <option value="{{$region->ID_VILLE}}">{{$region->NOM_VILLE}}</option>
                            @endforeach
                            
                            
                            </select>
                        </div></div>
                                           
                                           
                                           
                                            <div class="col-md-6">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">Adresse : </label><br>
                            
                           
					  		<input  id="adresse" class="form-control" required>
							
                        </div></div>
                                           
                                           
                                           <div class="col-md-6">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">Télèphone : </label><br>
                            
                           
					  		<input  id="tel" class="form-control" required>
							
                        </div></div>
                                           
                                           
                                           
                                           
                                           <div class="col-md-6">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">Capitale : </label><br>
                            
                           
					  	<div class="input-group">
                                                        <input type="text" id="capitale" class="form-control" required>
                                                        <span class="input-group-append" id="basic-addon3">
                                                            <label class="input-group-text" style="background-color:green;color:white">DH</label>
                                                        </span>
                                                    </div>
							
                        </div></div>
                                           
                                           
                                           
                                           <div class="col-md-6">
			        	<div class="form-group">
			        		<label class="col-form-label col-form-label-sm" for="clientCity">Type : </label><br>
                            
                           
					  		<select id="type" class="chosen-select1">
							@foreach($type as $type)	
                            <option value="{{$type->ID_TYPET}}">{{$type->LIBELLE_TYPET}}</option>
                            @endforeach
                            
                            
                            </select>
                        </div></div>
                                           
                                           
                                           
                   
                                        
                                        
                                        
                                        
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" data-role="sauvegarder" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>