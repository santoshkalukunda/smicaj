<div>
    <form action="{{route('trading-settings.index')}}" method="get">
        <div class="row">
            <div class="col-md-1">
                <div>
                    {{-- <label for="id" class="form-label">ID</label> --}}
                    <input type="number" min="1" class="form-control" name="id" placeholder="ID">
                </div>
            </div>
            <div class="col-md-3">
                <div>
                    {{-- <label for="exampleFormControlInput1" class="form-label">Trading</label> --}}
                    <select class="form-select @error('trading')  is-invalid @enderror" name="trading"
                        aria-label="Default select example">
                        <option value="">Select Trading</option>
                        <option value="intraday_trading">Intraday Trading</option>
                        <option value="swing_trading">Swing Trading
                        </option>
                        <option value="long_term_trading">Long Term Trading</option>
                    </select>
                    @error('trading')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div>
                    {{-- <label for="exampleFormControlInput1" class="form-label">Trading Time</label> --}}
                    <select class="form-select @error('trading_time')  is-invalid @enderror" name="trading_time"
                        aria-label="Default select example">
                        <option value="">Select trading time</option>
                        <option value="very_short_term">Very
                            Short Term</option>
                        <option value="Short_term">Short Term
                        </option>
                        <option value="long_term">Long Term
                        </option>
                    </select>
                    @error('trading_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div>
                    {{-- <label for="exampleFormControlInput1" class="form-label">Buy/Sell</label> --}}
                    <select class="form-select @error('buy_sell')  is-invalid @enderror" name="buy_sell"
                        aria-label="Default select example">
                        <option value="">Buy/Sell</option>
                        <option value="1">Buy</option>
                        <option value="0">Sell</option>
                    </select>
                    @error('buy_sell')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div>
                    {{-- <label for="exampleFormControlInput1" class="form-label">User</label> --}}
                    <select class="form-select @error('user_id')  is-invalid @enderror" name="user_id"
                        aria-label="Default select example">
                        <option value="">Select User</option>
                        @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    @error('buy_sell')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-1">
                <div>
                    <button type="submit" class="btn btn-primary form-control">Filter</button>
                </div>
            </div>
        </div>

    </form>
</div>
