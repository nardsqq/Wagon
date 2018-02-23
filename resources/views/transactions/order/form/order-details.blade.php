<div class="form-group m-t-10">
    <label for="po_client">Client</label>
    <input type="hidden" name="client_id" :value="client.int_client_id">
    <select name="po_client" id="po_client" class="form-control" v-model="client">
        <option v-for="client in clients" :key="client.int_client_id">@{{ client.str_client_name }}</option>
    </select>
</div>