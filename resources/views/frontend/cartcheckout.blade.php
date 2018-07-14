@extends('layouts.frontend_master')

@section('content')

<div class="container block-transparent mt-2 mb-2">
     
    <div class="row">

        <div class="headings animated fadeInLeft">
            Confirm Your Details
            <p>
                Please ensure, the details provided here are correct
            </p>
        </div>

    </div>

</div>

<div class="container block-white">

    <div class="row justify-content-center mt-2">
        <div class="col-md-12">

                <div class="card">
    
                    <div class="card-header text-white bg-dark">
                        <h4 class="card-title"><i class="fa fa-home"></i> Delivery Address</h4>
                        <h6 class="card-subtitle muted">Change/Update your address for order delivery</h6>
                    </div>
                    @include('includes.errors')
                    <form action="{{ route('profile.address') }}" method="post">
                        @csrf
                        <div class="card-body">
            
                            <div class="form-group">
                                <label for="contact">Contact Person
                                    <br>
                                    <small>If you aren&apos;t available to receive the delivery</small>
                                </label>
                                <input type="text" name="contact" id="contact" class="form-control" required value="{{ $user->profile->contact }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="cellnumber">Cell Phone #</label>
                                <input type="text" maxlength="11" minlength="11" name="cellnumber" id="cellnumber" class="form-control" required value="{{ $user->profile->cellnumber }}">
                            </div>
            
                            <div class="form-group">
                                <label for="landline">Landline #</label>
                                <input type="text" maxlength="11" minlength="11" name="landline" id="landline" class="form-control" value="{{ $user->profile->landline }}">
                            </div>
            
                            <div class="form-group">
                                <label for="address">Address
                                    <br><small>Your Complete address with a Prominent Landmark</small>
                                </label>
                                <textarea name="address" id="address" cols="5" rows="3" class="form-control" required>{{ $user->profile->address }}</textarea>
                            </div>
            
                            <div class="row">
                                <div class="col">
                                    <input type="submit" value="Update Delivery Address" class="form-control btn btn-success rounded-0">
                                </div>
                                <div class="col">
                                    <a href="{{ route('cart.confirm') }}" class="btn btn-danger form-control rounded-0">Finalize Order</a>
                                    {{-- <button class="btn btn-danger form-control rounded-0 btn-block" id="finalizeOrder" type="button">Finalize Order</button> --}}
                                </div>
                            </div>
                        </div>
                    </form>
            
                </div>

        </div>
    </div>
  


</div>
<br>
<br>
<br>
<br>
<br>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        
        $confirm_order_url = '{{ route('cart.confirm') }}';

        $('#finalizeOrder').click(function(){
            console.log('hi');
            $.ajax({
                type: "POST",
                url: $confirm_order_url,
                dataType: "json",
                success: function (response) {
                    console.log('hillll');
                    window.location.replace(response);
                },
                error: function(response){
                    console.log(response);
                }
            });

        });

    });
</script>
@endsection