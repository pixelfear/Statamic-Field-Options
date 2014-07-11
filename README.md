# Statamic-Field-Options

> Get a field's options from a fieldset.

Useful for grabbing options from a `select` fieldtype.


## Usage

If your field has key/value options, like the following:

```
colors:
  type: select
  options:
    f00: Red
    0f0: Green
    00f: Blue
```

Then you can use `{{ key }}` and `{{ value }}` respectively:

```
<select>
{{ field_options field="colors" }}
  <option value="{{ key }}">{{ value }}</option>
{{ /field_options }}
</select>
```

But if you have unnamed keys, like so:

```
colors:
  type: select
  options:
    - Red
    - Green
    - Blue
```

`{{ value }}` will be all you need. (Since `key` here would just be indexes)

```
<select>
{{ field_options field="colors" }}
  <option value="{{ value }}">{{ value }}</option>
{{ /field_options }}
</select>
```
