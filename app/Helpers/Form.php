<?php 

namespace App\Helpers;

class Form 
{

	public static function show($elements){
		$xhtml = null;

		// echo '<pre>'; 
		// print_r($elements);
		// echo '</pre>';
		foreach ($elements as $element) {
			$type = isset($element['type']) ? $element['type'] : 'input';
			if($type == 'input'){
			$xhtml .= sprintf(
				'<div class="form-group">
					%s
					<div class="col-md-6 col-sm-6 col-xs-12">
					%s
					</div>
				</div>',$element['label'],$element['element']
			);

						
			}else if($type == 'thumb'){
				$xhtml .= sprintf(
				'<div class="form-group">
					%s
					<div class="col-md-6 col-sm-6 col-xs-12">
						%s
						<p style="margin-top: 50px;">%s</p>
					</div>
				</div>',$element['label'],$element['element'],$element['thumb']
			);
			}else if($type == 'btn-submit'){

				$xhtml .= sprintf(
				'<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									%s
								</div>
						</div>',$element['element']
				);
			}
		
		}
		 return $xhtml;
	
	}
}
      
                



	?>



