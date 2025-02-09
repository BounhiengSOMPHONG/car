<div class="modal fade" id="addCarModal" tabindex="-1" aria-labelledby="addCarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCarModalLabel">{{ __('Add Car') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container mt-5">
                    <h1 class="text-center">Car Management Form</h1>
                    <form action="{{route('manager.createcar')}}" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow">
                        @csrf
                        <div class="row mb-3">
                            <label for="car_name" class="col-sm-3 col-form-label">Car Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="car_name" name="car_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="descriptions" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea id="descriptions" name="descriptions" class="form-control" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="price_daily" class="col-sm-3 col-form-label">Price Daily</label>
                            <div class="col-sm-9">
                                <input type="number" id="price_daily" name="price_daily" step="0.01"
                                    class="form-control" required>
                            </div>
                        </div>
                        {{-- <div class="row mb-3">
                            <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
                            <div class="col-sm-9">
                                <input type="number" id="quantity" name="quantity" class="form-control" required>
                            </div>
                        </div> --}}
                        <div class="row mb-3">
                            <label for="images" class="col-sm-3 col-form-label">Car Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="images" name="image" accept="image/*"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="car_status" class="col-sm-3 col-form-label">Car Status</label>
                            <div class="col-sm-9">
                                <select id="car_status" name="car_status" class="form-select" required>
                                    <option value="Available">Available</option>
                                    <option value="Maintenance">Maintenance</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="car_type_id" class="col-sm-3 col-form-label">Car Type</label>
                            <div class="col-sm-9">
                                <select id="car_type_id" name="car_type_id" class="form-select" required>
                                    <option value="">Select Car Type</option>
                                    @foreach ($cartypes as $carType)
                                        <option value="{{ $carType->car_type_id }}">{{ $carType->car_type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Save Car') }}</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
