<div class="d-flex">
    <a href="{{ route('checkout.show', ['checkout' => $barang->id]) }}" class="btn btn-outline-dark btn-sm me-2">
        <i class="bi bi-eye-fill"></i>
    </a>
    <a href="{{ route('checkout.edit', ['checkout' => $barang->id]) }}" class="btn btn-outline-dark btn-sm me-2">
        <i class="bi bi-clipboard2-check-fill"></i>
    </a>
    <a href="{{ route('checkout.edit', ['checkout' => $barang->id]) }}" class="btn btn-outline-dark btn-sm me-2">
        <i class="bi bi-pencil-fill"></i>
    </a>
    <div>
        <form action="{{ route('checkout.destroy', ['checkout' => $barang->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2 btn-delete"
            data-name="{{ $barangs->nama_barang }}">
                <i class="bi bi-trash-fill"></i>
            </button>
        </form>
    </div>
</div>
