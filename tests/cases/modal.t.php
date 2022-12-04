<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#yoymodal">
  Launch static backdrop modal
</button>

<b-modal id="yoymodal" title="Demo modal" size="lg" centered static>
    modal body
    <tpl slot="footer">
        <b-button v="primary">Btn</b-button>
    </tpl>
</b-modal>