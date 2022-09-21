<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <x-forms.input-group label="Nama Produk" name="product_name"
            value="{{ old('product_name', $product->product_name ?? '') }}" id="product" required="true"
            placeholder="Masukan Nama Produk">
        </x-forms.input-group>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <x-forms.input-group label="Stok Produk" name="product_stok"
            value="{{ old('product_stok', $product->product_stok ?? '') }}" id="stok" customAttribute="min=1"
            type="number" required="true" placeholder="Masukan Stok Produk">
        </x-forms.input-group>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <x-forms.input-group label="Harga Produk" name="product_price"
            value="{{ old('product_price', $product->product_price ?? '') }}" customAttribute="min=1" id="price"
            type="number" required="true" placeholder="Masukan Harga Produk">
        </x-forms.input-group>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12">
        <x-forms.input-group label="Foto Produk *(JPG | JPEG | PNG)" name="product_photo" customAttribute="min=1"
            id="image" type="file" required="true">
        </x-forms.input-group>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12">
        <img src="" id="preview" alt="Preview Image" width="200" height="150">
    </div>

</div>
