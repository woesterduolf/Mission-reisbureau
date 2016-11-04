<div class="b_room">
								<div class="booking_room">
									<div class="reservation">
										<ul>		
											<li  class="span1_of_1 left">
												 <h5>Van:</h5>
												 <div class="book_date">
													 <form>
														<input type="text" placeholder="Vertrek plaats" required="">
													 </form>
												 </div>					
											 </li>
											 <li  class="span1_of_1 left">
												 <h5>Naar:</h5>
												 <div class="book_date">
												 <form>
													<input type="text" placeholder="Aankomst plaats" required="">
												 </form>
												 </div>		
											 </li>
											 <li  class="span1_of_1 left">
												 <h5>Aankomst</h5>
												 <div class="book_date">
													 <form>
													 <input class="date" id="datepicker" type="text" value="2/04/2015" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '2/04/2015';}" required=>
													 </form>
												 </div>					
											 </li>
											 <li  class="span1_of_1 left">
												 <h5>Vertrek</h5>
												 <div class="book_date">
												 <form>
													<input class="date" id="datepicker1" type="text" value="22/08/2015" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '22/08/2015';}" required=>
												 </form>
												 </div>		
											 </li>
											 <li class="span1_of_1">
												 <h5>Klasse</h5>
												 <!----------start section_room----------->
												 <div class="section_room">
													  <select id="country" onchange="change_country(this.value)" class="frm-field required">
															<option value="null">Economy</option>
															<option value="null">Business</option>         
															<option value="AX">First Class</option>
															<option value="AX">Premium Economy</option>
													  </select>
												 </div>	
											 </li>
											 <li class="span1_of_3">
													<div class="date_btn">
														<form>
															<input type="submit" value="Boek nu!" />
														</form>
													</div>
											 </li>
											 <div class="clearfix"></div>
										</ul>
									 </div>
								</div>
								<div class="clearfix"></div>
							</div>
