<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of multiple_choice
 *
 * @author Rafal
 */
class MFPValidator_Multiple_choice extends MFPValidator {

    public function valid(stdClass $question, stdClass $response){
        $question->options = json_decode($question->options);
        $this->question = $question;
        $this->response = $response;
        //print_r($response);
        
        // Czy jest tablicą
        if(!$this->is_array()){
            
            // Czy jest wymagane
            if($this->is_required()){
                $this->set_message('reguired');
                return false;
            }
            
            
        }else{
            
            if(!$this->is_numeric()){
                $this->set_message('numeric');
                return false;
            }

            if(!$this->is_between_min_and_max()){
                $this->set_message('is_between_min_and_max');
                return false;
            }
        
        }
        
        return true;
    }
    
    protected function message(){
        return array(
            'reguired' => __('Question is required!'),
            'check_answer_exists' => __('Answer from question not exists!'),
            'is_between_min_and_max' => __('Selected answers not between min and max'),
            'numeric' => __('asdsad'),
        );
        
    }
}
