<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <x-forms.input-group label="Nama Customer" name="customer_name"
            value="{{ old('customer_name', $customer->customer_name ?? '') }}" id="customer" required="true"
            placeholder="Masukan Nama Customer">
        </x-forms.input-group>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <x-forms.input-group label="Nomor Telepon" name="customer_phone"
            value="{{ old('customer_phone', $customer->customer_phone ?? '') }}" id="phone" required="true"
            placeholder="Masukan Nomor Telepon">
        </x-forms.input-group>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <x-forms.textarea-group label="Alamat" name="address" value="{{ old('address', $customer->address ?? '') }}"
            id="address" required="true" placeholder="Masukan Alamat">
        </x-forms.textarea-group>
    </div>
</div>
