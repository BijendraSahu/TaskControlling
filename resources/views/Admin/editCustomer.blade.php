{{--<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}

                    <form>

                        <div class="row">
                            <div class="input-group col-sm-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="firstname"><i class="fa fa-pencil-square-o"></i></label>
                                </div>
                                <input type="text" class="form-control" value="{{$data->CustomerFirstname}}" id="firstname1" >
                            </div>
                            <div class="input-group col-sm-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="lastname"><i class="fa fa-pencil-square-o"></i> </label>
                                </div>
                                <input type="text" class="form-control" id="lastname1" value="{{$data->CustomerLastname}}">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="input-group col-sm-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="email"><i class="fa fa-envelope-o"></i></label>
                                </div>
                                <input type="email" class="form-control" id="email1" value="{{$data->CustomerEmail}}">
                            </div>
                            <div class="input-group col-sm-6">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="number"><i class="fa fa-mobile-phone"></i></label>
                                </div>
                                <input type="text" class="form-control" id="number1" value="{{$data->CustomerMobile}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="input-group col-md-12">
                                <div class="input-group-prepend">
                                    <label for="address" class="input-group-text"><i class="fa fa-address-book-o"></i></label>
                                </div>
                            <input type="text" class="form-control" id="address1" value="{{$data->CustomerAddress}}">
                        </div>
                        </div>
                            <br>
                            <div class="row">
                                <div class="input-group col-sm-6">
                                    <div class="input-group-prepend">
                                        <label for="landmark" class="input-group-text"><i class="fa fa-map-marker"></i></label>
                                    </div>
                                <input type="text" class="form-control" id="landmark1" value="{{$data->CustomerLandmark}}">
                            </div>
                                <div class="input-group col-sm-6">
                                    <div class="input-group-prepend">
                                        <label for="city" class="input-group-text"><i class="fa fa-map"></i></label>
                                    </div>
                                <input type="text" class="form-control" id="city1" value="{{$data->CustomerCity}}">
                            </div>
                        </div>
                        <input type="hidden" id="id" value="{{$data->id}}">

                    </form>
