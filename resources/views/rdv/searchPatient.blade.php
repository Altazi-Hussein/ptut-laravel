<select name="patient" class="form-control mb-2">
    @foreach ($patients as $patient)
        <option value="{{ $patient->id }}">{{$patient->firstName}} {{ $patient->lastName}}</option>
    @endforeach
</select>