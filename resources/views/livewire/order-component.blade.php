<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <td>Subtotal</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($this->orderProducts as $index => $orderProduct)
            <tr>
                <td>
                    <input type="hidden" name="orderProducts[{{$index}}][product_id]" wire:model="orderProducts.{{$index}}.product_id" />
                    <select name="orderProducts" class="form-control" wire:model="orderProducts.{{ $index }}.product_id">
                        <option value="">-- Producto --</option>
                        @foreach ($this->products as $product)
                        <option value="{{ $product->id }}">
                            {{ $product->name }}
                            (${{ number_format($product->price, 2) }})
                        </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" step="1" name="orderProducts[{{$index}}][price]" class="form-control" wire:model="orderProducts.{{$index}}.price" value="1" />
                </td>
                <td>
                    <input type="number" step="1" name="orderProducts[{{$index}}][quantity]" class="form-control" wire:model="orderProducts.{{$index}}.quantity" wire:keyup="calculateSubTotal({{$index}})" />
                </td>
                <td>
                    {{ number_format($orderProduct['subtotal'], 2) }}
                </td>
                @empty

                @endforelse
            </tr>
        </tbody>
    </table>

    <div>
        <button class="btn btn-primary" wire:click.prevent="addProduct">+ Agregar Producto</button>
    </div>
</div>
