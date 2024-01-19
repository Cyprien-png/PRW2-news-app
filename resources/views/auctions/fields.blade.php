<label>Valeur</label>
<input type="number" name="value" value="{{ $auction->body }}">
@error('auction.value')
  <div class="alert alert-danger">{{ $message }}</div>
@enderror
<label>Votre email</label>
<input name="email_address" value="{{ $auction->email_address }}">
@error('auction.email_address')
  <div class="alert alert-danger">{{ $message }}</div>
@enderror