<div>
    <label for="stock" class="form-label">Stock Setting</label>
    <select class="form-select" name="stock_id" aria-label="Default select example">
       @foreach ($stocks as $stock)
       <option value="{{$stock->id}}" {{$_GET['stock_id']== $stock->id  ? "selected" : ""}}>{{$stock->name}}</option>
       @endforeach
    </select>
</div>
