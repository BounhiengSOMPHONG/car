@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>view customer</h1>
@stop


@section('content')
    <h2 class="mb-2">customer List</h2>
    <table class="table table-bordered">
        <thead class="table">
            <tr>
                <th> ID</th>
                <th>Name</th>
                <th>age</th>
                <th>phone</th>
                <th>email</th>
                <th>zipcode</th>
                <th>address</th>
                <th>city</th>
                <th>country</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customer as $data)
                <tr>
                    <td>{{ $data->cus_id }}</td>
                    <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                    <td>{{ $data->age }}</td>
                    <td>{{ $data->phone_number  }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->zipcode }}</td>
                    <td>{{ $data->address }}</td>
                    <td>{{ $data->city }}</td>
                    <td>{{ $data->country }}</td>
                    <td>
                        <!-- Use a class instead of an ID for images -->
                        <img src="{{ asset($data->image) }}" class="myImg" alt="" width="100" height="100">
                    </td>
                    <td>
                        <form action="{{ route('admin.deletecustomer', ['id' => $data->cus_id]) }}" method="get">
                            <button class="edit btn btn-warning" data-id="{{ $data->cus_id }}" data-bs-toggle="modal"
                                data-bs-target="#addCarModalEdit">Edit</button>
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!!$customer->links('pagination::bootstrap-5')!!}
    {{-- <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div> --}}
@stop
@include('admin.edituser')
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
    <script>
        // Insert/edit functionality
        $(document).ready(function() {
            $(document).on("click", ".edit", function(e) {
                e.preventDefault();
                var cusID = $(this).data("id");
                console.log("id na :", cusID);

                $.ajax({
                    url: "{{ route('admin.editcustomer') }}",
                    type: "GET",
                    data: {
                        cus_id: cusID
                    },
                    success: function(data) {
                        console.log("data :", data.cusData);
                        $('#cus_id').val(data.cusData.cus_id);
                        $('#first_name').val(data.cusData.first_name);
                        $('#last_name').val(data.cusData.last_name);
                        $('#phone_number').val(data.cusData.phone_number);
                        $('#email').val(data.cusData.email);
                        $('#age').val(data.cusData.age);
                        $('#zipcode').val(data.cusData.zipcode);
                        $('#city').val(data.cusData.city);
                        $('#address').val(data.cusData.address);
                        $('#country').val(data.cusData.country);
                        $('#image').val(data.cusData.image);
                        $('#addCarModalEdit').modal('show');
                    },
                    error: function(xhr) {
                        console.error("testtt", xhr.responseText);
                    }
                });
            });
        });

        // Update functionality
        $("#updatetEditForm").on("submit", function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            console.log("Form Data:", Object.fromEntries(formData));
            $.ajax({
                url: "{{ route('admin.updatecustomer') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        console.log(response.success);
                        setTimeout(function() {
                            location.reload();
                        }, 100);

                        $('#addCarModalEdit').modal('hide');
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        });

        // document.addEventListener("DOMContentLoaded", function() {
        //     var modal = document.getElementById("myModal");
        //     var modalImg = document.getElementById("img01");
        //     var captionText = document.getElementById("caption");
        //     var images = document.querySelectorAll(".myImg");
        //     images.forEach(function(img) {
        //         img.onclick = function() {
        //             modal.style.display = "block";
        //             modalImg.src = this.src;
        //             captionText.innerHTML = this.alt;
        //         }
        //     });
        //     var span = document.getElementsByClassName("close")[0];
        //     span.onclick = function() {
        //         modal.style.display = "none";
        //     }
        //     window.onclick = function(event) {
        //         if (event.target == modal) {
        //             modal.style.display = "none";
        //         }
        //     }
        // });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@stop
@section('css')
    {{-- Add Bootstrap Select CSS --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
   
@stop
