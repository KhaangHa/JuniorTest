<?php
namespace Magenest\Junior\Ui\Component\Grid\SalesOrder;
use Magento\Ui\Component\Listing\Columns\Column;

class GiftCard extends Column{
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $data = $item['gift_card'] ?? null;
                if($data){
                    $outPut = json_decode($data, true);
                    $name = $outPut["name"] ?? null;
                    $message = $outPut["message"] ?? null;
                    $html = "<fieldset><legend>GIFT CARD</legend>
                                <span><b>To: </b> " . $name . "</span><br>
                                <span><b>Message: </b> " . $message . "</span>
                            </fieldset>";
                    $item['gift_card'] = $html;
                }
            }
        }

        return $dataSource;
    }
}