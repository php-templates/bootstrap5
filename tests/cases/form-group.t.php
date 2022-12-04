<b-form-group type="text" name="name" label="Name" value="value" error="error" size="sm" />
<b-form-group type="text" name="name" label="Name" value="value" error="error" inline />
<b-form-group type="text" name="name" label="Name" value="value" error="error" append="$" inline />
<b-form-group type="text" name="name" label="Name" value="value" error="error" prepend="@" size="sm" />
<b-form-group type="select" name="select" label="Select" value="2" error="error" prepend="@" :options="[['label'=>'Lorem','value'=>1], ['label'=>'Ipsum','value'=>2]]" />
<b-form-group type="select" name="select" label="Select" value="2" error="error" prepend="@" :options="[['label'=>'Lorem','value'=>1], ['label'=>'Ipsum','value'=>2]]" inline />
<b-form-group type="select" name="select" label="Select" value="2" error="error" prepend="@" :options="[['label'=>'Lorem','value'=>1], ['label'=>'Ipsum', 'disabled' => true,'value'=>2]]" blank="Select" />
<b-form-group type="select" name="select" label="Select" value="2" error="error" prepend="@" :options="[['label'=>'Lorem','value'=>1], ['label'=>'Ipsum','value'=>2]]" multiple />
<b-form-group type="textarea" name="textarea" label="Textarea" value="textarea" error="error" prepend="@" rows="7"/>
<b-form-group type="range" name="range" label="range" value="3" error="error" min="2" max="10"/>
<b-form-group type="checkbox" name="checkbox" label="checkbox1" value="3" error="error" checked />
<b-form-group type="checkbox" name="checkbox" label="checkbox1" value="3" error="error" inline :checked="3 > 2" />
<b-form-group type="checkbox" name="checkbox" label="checkbox1" value="3" error="error" inline :checked="2 > 3" />
<b-form-group type="switch" name="checkbox" label="checkbox1" value="3" error="error" :checked="2 > 3" />
<b-form-group type="switch" name="checkbox" label="checkbox1" value="3" error="error" :checked="2 > 3" disabled />
<b-form-group type="text" name="checkbox" label="checkbox1" value="3" error="error" disabled>
    <b-dropdown slot="prepend" :items="[['type'=>'text','text'=>'foo']]" label="yee" v="primary"></b-dropdown>
</b-form-group>