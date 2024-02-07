<div class="modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Redaruoti įmonę</h5>
          <button type="button" data-close class="btn-close"></button>
        </div>

            <form>
                <div class="modal-body">
                        <?php $newCompanies = [
                                [
                                    'label' => 'Tipas',
                                    'name' => 'type',
                                    'value' => "$company->type",
                                ],
                                [
                                    'label' => 'Pavadinimas',
                                    'name' => 'name',
                                    'value' => "$company->name",
                                ],
                            ]; ?>
                        @foreach ($newCompanies as $newCompany)
                        <div class="form-group mt-2">
                            <label>{{$newCompany['label']}}</label>
                            <input type="text" name="{{$newCompany['name']}}" class="form-control" value="{{$newCompany['value']}}">
                        </div>
                        @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" data-close class="btn btn-secondary">Ne</button>
                    <button type="button" data-update data-url="{{route('companies-update', $company)}}" class="btn btn-primary">Išsaugoti</button>
                </div>
            </form>
        
      </div>
    </div>
</div>