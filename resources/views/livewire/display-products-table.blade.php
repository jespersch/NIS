<div class="content-wrapper">
    <table class="table table-striped table-bordered DisplayTable mx-auto mt-5">
        <thead>
        <tr>
            <th scope="col">Material</th>
            <th scope="col">Category</th>
            <th scope="col">Stock</th>
            <th scope="col">Minimum Stock</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category}}</td>
                <td>{{$product-> stock}}</td>
                <td>{{$product-> minstock}}</td>

                <td>

                    @if($product->stock < $product-> minstock)
                        <button class="orderButton urgentOrder"
                                wire:click="setProductId({{ $product->id }})"> Order
                        </button>
                    @else
                        <button class="orderButton "
                                wire:click="setProductId({{ $product->id }})"> Order
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
                    <h5 class="modal-title" id="orderModalLabel">Order  {{ $selectedProduct ? $selectedProduct->name : 'N/A' }}</h5>
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
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="cancelOrderButton" data-dismiss="modal">Close</button>
                    <button type="button" class="confirmOrderButton" wire:click="sendOrder({{$selectedProduct ? $selectedProduct->id : null}})">Order</button>
                </div>
            </div>
        </div>
    </div>
    @if($selectedProduct)
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
