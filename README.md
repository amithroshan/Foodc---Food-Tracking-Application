# Food Tracking Application

## Overview

This project is a Dockerized and Kubernetes-deployed Food Tracking Application. The stack includes a PHP-MySQL backend with an NGINX load balancer. The application is scalable and utilizes Kubernetes for efficient container orchestration. Below are the steps to set up and deploy the application.

Prerequisites

## Ensure the following tools are installed on your system:
Docker

Docker Compose

Minikube

Kubectl

Git

# Setup Instructions
### 1. Clone the Repository
git clone <repository_url>
cd <repository_name>


### 2. Dockerize the Application
Build and Push the PHP Application:
docker build -t foodc-app app/.
docker tag foodc-app amithroshan/foodc-app
docker push amithroshan/foodc-app

### Build and Push the NGINX Load Balancer:
docker build -t amithroshan/nginx:latest .
docker push amithroshan/nginx:latest

## 3. Use Docker Compose for Local Testing
### Start the Environment:
docker-compose up --build

### Scale the Application:
docker-compose up --scale app=3 --build

### Stop and Clean Up:
docker-compose down -v


### Kubernetes Deployment
1. Start Minikube
minikube start

## 2. Set Minikube Context
kubectl config use-context minikube

## 3. Apply Kubernetes Manifests

kubectl apply -f app-deployment.yaml
kubectl apply -f mysql-deployment.yaml
kubectl apply -f nginx-deployment.yaml
kubectl apply -f mysql-configmap.yaml


## 4. Check Deployment Status
### Pods:
kubectl get pods

### Deployments:
kubectl get deployments

### Services:
kubectl get svc


## 5. Access the Application
### Open the NGINX Load Balancer:
minikube service nginx-service

### Debugging and Logs
### View Pod Logs:
kubectl logs <pod-name>

### Describe Pod:
kubectl describe pod <pod-name>

### Describe Service:
kubectl describe service <service-name>




## Directory Structure

├── app/                       # PHP Application Code Directory

├── app-deployment.yaml        # Kubernetes Deployment for PHP Application

├── docker-compose.yml         # Docker Compose Configuration

├── Dockerfile                 # Dockerfile for PHP Application

├── foodc.sql                  # SQL Script for Database Initialization

├── mysql-configmap.yaml       # ConfigMap for MySQL

├── mysql-deployment.yaml      # Deployment for MySQL

├── nginx-deployment.yaml      # Deployment for NGINX

├── nginx.conf                 # NGINX Configuration File

└── README.md                  # Project Documentation


## Notes

Ensure all images are correctly tagged and pushed to Docker Hub before deploying.

Verify Minikube and Kubernetes configurations for compatibility with your system.

Update service names in the Kubernetes YAML files if needed.
