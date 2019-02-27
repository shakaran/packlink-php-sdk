<?php

namespace PackLink\Entity;

/**
 *
 * @author Ángel Guzmán Maeso <angel@guzmanmaeso.com>
 *
 */
class User
{
    private $email;

    private $password;

    private $estimated_delivery_volume;

    private $platform;

    private $platform_country;

    private $phone;

    private $ip;

    private $source;

    private $policies;

    private $terms_and_conditions;

    private $data_processing;

    private $marketing_emails;

    private $marketing_calls;

    private $onboarding_product;

    private $onboarding_sub_product;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getEstimated_delivery_volume()
    {
        return $this->estimated_delivery_volume;
    }

    /**
     * @return mixed
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @return mixed
     */
    public function getPlatform_country()
    {
        return $this->platform_country;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return mixed
     */
    public function getTerms_and_conditions()
    {
        return $this->terms_and_conditions;
    }

    /**
     * @return mixed
     */
    public function getData_processing()
    {
        return $this->data_processing;
    }

    /**
     * @return mixed
     */
    public function getMarketing_emails()
    {
        return $this->marketing_emails;
    }

    /**
     * @return mixed
     */
    public function getMarketing_calls()
    {
        return $this->marketing_calls;
    }

    /**
     * @return mixed
     */
    public function getOnboarding_product()
    {
        return $this->onboarding_product;
    }

    /**
     * @return mixed
     */
    public function getOnboarding_sub_product()
    {
        return $this->onboarding_sub_product;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param mixed $estimated_delivery_volume
     */
    public function setEstimated_delivery_volume($estimated_delivery_volume)
    {
        $this->estimated_delivery_volume = $estimated_delivery_volume;

        return $this;
    }

    /**
     * @param mixed $platform
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * @param mixed $platform_country
     */
    public function setPlatform_country($platform_country)
    {
        $this->platform_country = $platform_country;

        return $this;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @param mixed $terms_and_conditions
     */
    public function setTerms_and_conditions($terms_and_conditions)
    {
        $this->terms_and_conditions = $terms_and_conditions;

        return $this;
    }

    /**
     * @param mixed $data_processing
     */
    public function setData_processing($data_processing)
    {
        $this->data_processing = $data_processing;

        return $this;
    }

    /**
     * @param mixed $marketing_emails
     */
    public function setMarketing_emails($marketing_emails)
    {
        $this->marketing_emails = $marketing_emails;

        return $this;
    }

    /**
     * @param mixed $marketing_calls
     */
    public function setMarketing_calls($marketing_calls)
    {
        $this->marketing_calls = $marketing_calls;

        return $this;
    }

    /**
     * @param mixed $onboarding_product
     */
    public function setOnboarding_product($onboarding_product)
    {
        $this->onboarding_product = $onboarding_product;

        return $this;
    }

    /**
     * @param mixed $onboarding_sub_product
     */
    public function setOnboarding_sub_product($onboarding_sub_product)
    {
        $this->onboarding_sub_product = $onboarding_sub_product;

        return $this;
    }

    public function __toString(): string
    {
        //missing required properties: ['platform', 'platform_country', 'password', 'email', 'estimated_delivery_volume']
        $data = (array) $this;

        $result = [];
        if(!empty($data))
        {
            foreach($data as $key => $value)
            {
                $newKey = trim(str_replace(get_class($this), '', $key));

                if(in_array($newKey, ['terms_and_conditions', 'data_processing', 'marketing_emails', 'marketing_calls']) )
                {
                    $result['policies'][$newKey] = $value;
                }
                elseif(in_array($newKey, ['onboarding_product', 'onboarding_sub_product']) )
                {
                    $result['referral'][$newKey] = $value;
                }
                else
                {
                    $result[$newKey] = $value;
                }
            }
        }

        return json_encode($result, TRUE);
    }
}