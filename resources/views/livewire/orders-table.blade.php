<div class="content-wrapper">

    <table class="table table-striped table-bordered DisplayTable mx-auto mt-5">
        <thead>
        <tr>
            <th scope="col">Order type</th>
            <th scope="col">Material</th>
            <th scope="col">Quantity</th>
            <th scope="col">Supplier</th>
            <th scope="col">Price</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        @foreach ($data as $order)
            <tr>
                <td>@if($order->ordertype == 1) Stock Order @else Product Order @endif</td>
                <td>{{ $order->name }}, {{$order->length}} m rol</td>
                <td>{{ $order->quantity}}</td>
                <td>{{ $order->supplier }}</td>
                <td>€ {{ $order->quantity * $order->price }},-</td>
                @php
                $materialname = "$order->name, $order->length" . 'm rol';
                @endphp
                <h1>{{$materialname}}</h1>
                <td>
                    <button class="approveButton"
                            wire:click="approveOrder({{$order->id}}, '{{$materialname}}')"> Approve
                    </button>
                </td>
                <td>
                    <button class="declineButton "
                            > Decline
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@if(isset($order))
    @script
    <script>
        $("document").ready(function () {
            const buttons = document.querySelectorAll('.declineButton');
            // Add event listener to each button
            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    this.style.backgroundColor = 'red';
                    this.setAttribute("wire:click", 'declineOrder({{$order->id}})');
                    this.innerHTML = 'Are you sure?';
                    this.removeEventListener('click', arguments.callee);
                });
            });
        });
    </script>
    @endscript
@endif
