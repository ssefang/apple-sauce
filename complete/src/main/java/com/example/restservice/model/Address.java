package com.example.restservice.model;

public class Address {
    private int number;
    private String street;
    private String postCode;

    public Address(int number, String street, String postCode) {
        this.number = number;
        this.street = street;
        this.postCode = postCode;
    }

    public int getNumber() {
        return number;
    }

    public void setNumber(int number) {
        this.number = number;
    }

    public String getStreet() {
        return street;
    }

    public void setStreet(String street) {
        this.street = street;
    }

    public String getPostCode() {
        return postCode;
    }

    public void setPostCode(String postCode) {
        this.postCode = postCode;
    }

    @Override
    public String toString() {
        return "Address{" +
                "number=" + number +
                ", street='" + street + '\'' +
                ", postCode='" + postCode + '\'' +
                '}';
    }
}
