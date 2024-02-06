<div>
    <table class="table table-striped table-bordered DisplayTable mx-auto mt-5">
        <thead>
        <tr>
            <th scope="col">Material</th>
            <th scope="col">Supplier</th>
            <th scope="col">Price</th>
            <th scope="col">Stock</th>
            <th scope="col">Minimum Stock</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $material)
            <tr>
                <td>{{ $material->material }}</td>
                <td>{{ $material->supplier}}</td>
                <td>€ {{ $material->cost }}</td>
                <td>{{$material-> stock}}</td>
                <td>{{$material-> minstock}}</td>

                <td>

                    @if($material->stock < $material-> minstock)
                    <button class="orderButton urgentOrder"
                            wire:click="setMaterialId({{ $material->id }})"> Order
                    </button>
                    @else
                        <button class="orderButton "
                                wire:click="setMaterialId({{ $material->id }})"> Order
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Order  {{ $selectedMaterial ? $selectedMaterial->material : 'N/A' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <form wire:submit.prevent="sendOrder">
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" min="0" class="form-control" id="quantity" wire:model="quantity">
                            </div>
                            <div class="form-group">
                                <label for="cost">Cost:</label>
                                <input id="costhidden" type="hidden" value="{{$selectedMaterial ? $selectedMaterial->cost : null}}">
                                <h3 id="cost">€0,-</h3>
                            </div>
                        </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="cancelOrderButton" data-dismiss="modal">Close</button>
                    <button type="button" class="confirmOrderButton" wire:click="sendOrder({{$selectedMaterial ? $selectedMaterial->id : null}})">Order</button>
                </div>
            </div>
        </div>
    </div>
    @if($selectedMaterial)
        @script
        <script>

            // Listen for the browser event to open the modal
            $("#quantity").on('input', function() {
                var quantity = $(this).val();
                var costPerUnit = $("#costhidden").val();
                var totalCost = quantity * costPerUnit;
                $("#cost").text("€" + totalCost + ",-");
            });

            $wire.on('openOrderModal', function () {
                $('#orderModal').modal('show');
            });
        </script>
        @endscript
    @endif
</div>
