<div class="b_room">
								<div class="booking_room">
									<div class="reservation">
										<ul>		
											<li  class="span1_of_1 left">
												 <h5>Arrival</h5>
												 <div class="book_date">
                                                                                                    
                                                                                                         <input class="date" id="datepicker" name="arrival" type="text" value="12/15/2016" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '12/15/2016';}" required=>
													
												 </div>					
											 </li>
											 <li  class="span1_of_1 left">
												 <h5>Departure</h5>
												 <div class="book_date">
												 
													<input class="date" name="departure" id="datepicker1" type="text" value="12/15/2016" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '12/15/2016';}" required=>
												
												 </div>		
											 </li>
											 <li class="span1_of_1">
												 <h5>Transport</h5>
												 <!----------start section_room----------->
												 <div class="section_room">
                                                                                                     <select id="transport" name="transport" onchange="change_country(this.value)" class="frm-field required">
															<option value="eigenVervoer">Eigen vervoer</option>
															<option value="busPage">Bus</option>         
															<option value="flightPage">Vliegtuig</option>
															
													  </select>
												 </div>	
											 </li>
											 <li class="span1_of_3">
													<div class="date_btn">
														
                                                                                                            <input type="submit" name="submit" value="Boek nu!" />
														
													</div>
											 </li>
											 <div class="clearfix"></div>
										</ul>
									 </div>
								</div>
								<div class="clearfix"></div>
							</div>
