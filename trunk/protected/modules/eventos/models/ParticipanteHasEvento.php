<?php

Yii::import('application.modules.eventos.models._base.BaseParticipanteHasEvento');

class ParticipanteHasEvento extends BaseParticipanteHasEvento {

    /**
     * @return ParticipanteHasEvento
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'ParticipanteHasEvento|ParticipanteHasEventos', $n);
    }

    public function relations() {
        return array(
            'participante' => array(self::BELONGS_TO, 'Participante', 'participante_id'),
            'evento' => array(self::BELONGS_TO, 'Evento', 'evento_id'),
        );
    }

    public function de_participante($participante_id) {
        $this->getDbCriteria()->mergeWith(
                array(
                    'select' => 'evento_id',
                    'condition' => 'participante_id = :participante_id',
                    'params' => array(
                        ':participante_id' => $participante_id
                    ),
                )
        );
        return $this;
    }

    //obtiene los eventos_id de un participante
    public function getEventosParticipante($participante_id) {
        /* select pe.evento_id from participante_has_evento pe
          where pe.participante_id=12 */
        $eventos_id = array();
        $command = Yii::app()->db->createCommand()
                ->select("pe.evento_id")
                ->from("participante_has_evento pe")
                ->where("pe.participante_id = :participante_id", array(':participante_id' => $participante_id))
                ->queryAll();
        foreach ($command as $evento) {
            array_push($eventos_id, (int) $evento['evento_id']);
        }
        return $eventos_id;
    }

}
