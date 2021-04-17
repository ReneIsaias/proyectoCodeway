<div wire:ignore.self class="modal fade" id="deleteHoliday" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteHolidayModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="deleteHolidayModal">BORRAR VACACIÓN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <h4>¿Seguro que quieres eliminar esta vacación?</h4>
                        <h3 class="text-dark text-uppercase">{{ $days }} {{ $beginDate }} {{ $endDate }} {{ $inProcess }} {{ $taken }} {{ $available }}</h3>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group justify-content-start">
                    <div wire:loading wire:loading.class="bg-white">Procesando datos...</div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="clean()">Cancelar</button>
                <button type="button" class="btn btn-danger" wire:click.prevent="destroy()">Eliminar Vacación</button>
            </div>
        </div>
    </div>
</div>
