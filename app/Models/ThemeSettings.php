<?php
namespace App\Models;
use \OptimistDigital\NovaSettings\Models\Settings;
/*
 * This is our own extension of OptimistDigital Settings Model.
 * Reason: NovaSettings doesn't work correctly with Flexible fields which contain Files/Images. Read in detail below!
 */
class ThemeSettings extends Settings
{
  public function setValueAttribute($value)
  {
      if($value instanceof \Illuminate\Support\Collection && $value->isNotEmpty() && isset($value->get(0)['layout'])) {
        // ^^^ This means that $value is a Collection AND basically Flexible content! ^^^
        /*
         * Issue: Image field inside flexible field get's overwritten by new POST sent data (which doesn't contain images/files if these are not intentionally updated by editor)
         * Expected: Previously selected image should stay in JSON.
         * Instead: All Flexible data get's overwritten by current POST data, which does not contain image/file field since editor maybe didn't want to change the previously added image!
         * Why: Settings model just takes the flexible fields collection ($value) from POST and encodes it to JSON and stores it in DB. Images/Files are NOT SENT over POST request if NEW image/file is not selected.
         * Fix: Compare old flexible-fields JSON in DB with newly sent POST data AND update only values that need to be updated instead of overwritting the whole flexible-field JSON!
         */
        $value = array_replace_recursive(json_decode($this->attributes['value'] ?? '[]', true), $value->toArray());
      }
      $this->attributes['value'] = is_array($value) ? json_encode($value) : $value;
  }
}