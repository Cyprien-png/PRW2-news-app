<label>Valeur</label>
<input type="number" name="value" value="{{ $auction->body }}">
<!-- @error('title')
  <div class="alert alert-danger">{{ $message }}</div>
@enderror -->
<label>Votre email</label>
<input name="email" value="{{ $auction->email_address }}">
<!-- @error('body')
  <div class="alert alert-danger">{{ $message }}</div>
@enderror -->